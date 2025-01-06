<?php

namespace App\Controllers;

use App\Models\PlanModel;
use App\Models\PlanUserModel;
use App\Models\UserModel; 
use CodeIgniter\Controller;

class PlanController extends Controller
{
    // Menampilkan daftar rencana perjalanan
    public function index()
    {
        $planModel = new PlanModel();
        $planUserModel = new PlanUserModel();
        $userModel = new UserModel();
    
        // Periksa apakah pengguna sudah login
        $isLoggedIn = session()->get('isLoggedIn');
        $userName = session()->get('name');
        $userId = session()->get('id');
    
        // Mengambil rencana yang dimiliki oleh user
        $yourPlans = $planModel->where('user_id', $userId)->findAll();
    
        // Menambahkan data shared_users ke $yourPlans
        foreach ($yourPlans as &$plan) {
            $sharedUsers = $planUserModel->where('plan_id', $plan['id'])->findAll();
            $plan['shared_users'] = [];
            foreach ($sharedUsers as $sharedUser) {
                $user = $userModel->find($sharedUser['user_id']);
                if ($user) {
                    $plan['shared_users'][] = $user['email'];
                }
            }
        }
    
        // Mengambil rencana yang dibagikan kepada user
        $sharedPlans = $planUserModel
        ->select('plans.*, plan_users.is_owner')
        ->join('plans', 'plans.id = plan_users.plan_id')
        ->where('plan_users.user_id', $userId)
        ->where('plans.user_id !=', $userId)
        ->findAll();

        $plansSharedToYou = [];
        foreach ($sharedPlans as $sharedPlan) {
            // Menambahkan data shared_users
            $sharedUsers = $planUserModel->where('plan_id', $sharedPlan['id'])->findAll();
            $sharedPlan['shared_users'] = [];
            foreach ($sharedUsers as $sharedUser) {
                $user = $userModel->find($sharedUser['user_id']);
                if ($user) {
                    $sharedPlan['shared_users'][] = $user['email'];
                }
            }
            $plansSharedToYou[] = $sharedPlan;
        }

        // Mengirim data ke view
        return view('plans/index', [
            'isLoggedIn' => $isLoggedIn,
            'userName' => $userName,
            'yourPlans' => $yourPlans,
            'plansSharedToYou' => $plansSharedToYou,
        ]);
    }

    // Menampilkan form pembuatan rencana perjalanan
    public function create()
    {
        return view('plans/create');
    }

    public function store()
    {
        log_message('debug', '>>> Store method called');
        log_message('debug', 'Request Method: ' . $this->request->getMethod());
        
        if ($this->request->getMethod() === 'POST' && $this->request->getPost()) {
            $userId = session()->get('id');
            log_message('debug', 'User ID from session: ' . $userId);
            
            $validation = \Config\Services::validation();
            $validation->setRules([
                'destination' => 'required|min_length[3]',
                'start_date' => 'required|valid_date',
                'end_date' => 'required|valid_date',
                'activities' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                log_message('error', 'Validation errors: ' . print_r($validation->getErrors(), true));
                return redirect()->back()
                    ->with('error', implode(', ', $validation->getErrors()))
                    ->withInput();
            }
            
            $data = [
                'user_id' => $userId,
                'destination' => $this->request->getPost('destination'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'activities' => $this->request->getPost('activities'),
            ];
            
            log_message('debug', 'Data prepared for saving: ' . print_r($data, true));
            
            $planModel = new PlanModel();
            
            try {
                if ($planModel->save($data)) {
                    log_message('debug', 'Data saved successfully');
                    return redirect()->to('/plans')->with('success', 'Plan saved successfully!');
                } else {
                    log_message('error', 'Model validation errors: ' . print_r($planModel->errors(), true));
                    return redirect()->back()
                        ->with('error', implode(', ', $planModel->errors()))
                        ->withInput();
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception occurred while saving: ' . $e->getMessage());
                return redirect()->back()
                    ->with('error', 'An error occurred while saving the plan')
                    ->withInput();
            }
        }
        
        log_message('debug', 'Invalid request method or no POST data');
        return redirect()->back()
            ->with('error', 'Invalid request')
            ->withInput();
    }

    public function edit($id)
    {
        $planModel = new PlanModel();
        $plan = $planModel->find($id);

        if (!$plan) {
            return redirect()->to('/plans')->with('error', 'Plan not found!');
        }

        return view('plans/edit', ['plan' => $plan]);
    }

    public function update($id)
    {
        log_message('debug', '>>> Update method called for ID: ' . $id);
        log_message('debug', 'Request Method: ' . $this->request->getMethod());

        if ($this->request->getMethod() === 'POST' && $this->request->getPost()) {
            $planModel = new PlanModel();

            $existingPlan = $planModel->find($id);
            if (!$existingPlan) {
                log_message('error', 'Plan with ID ' . $id . ' not found!');
                return redirect()->to('/plans')->with('error', 'Plan not found!');
            }

            $validation = \Config\Services::validation();
            $validation->setRules([
                'destination' => 'required|min_length[3]',
                'start_date' => 'required|valid_date',
                'end_date' => 'required|valid_date',
                'activities' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                log_message('error', 'Validation errors: ' . print_r($validation->getErrors(), true));
                return redirect()->back()
                    ->with('error', implode(', ', $validation->getErrors()))
                    ->withInput();
            }

            $data = [
                'destination' => $this->request->getPost('destination'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'activities' => $this->request->getPost('activities'),
            ];

            log_message('debug', 'Data prepared for updating: ' . print_r($data, true));

            try {
                if ($planModel->update($id, $data)) {
                    log_message('debug', 'Data updated successfully for ID: ' . $id);
                    return redirect()->to('/plans')->with('success', 'Plan updated successfully!');
                } else {
                    log_message('error', 'Model validation errors during update: ' . print_r($planModel->errors(), true));
                    return redirect()->back()
                        ->with('error', implode(', ', $planModel->errors()))
                        ->withInput();
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception occurred while updating: ' . $e->getMessage());
                return redirect()->back()
                    ->with('error', 'An error occurred while updating the plan')
                    ->withInput();
            }
        }

        log_message('debug', 'Invalid request method or no POST data for update');
        return redirect()->back()
            ->with('error', 'Invalid request')
            ->withInput();
    }

    public function delete($id)
    {
        $planModel = new PlanModel();
        if ($planModel->delete($id)) {
            return redirect()->to('/plans')->with('success', 'Plan deleted successfully!');
        } else {
            return redirect()->to('/plans')->with('error', 'Failed to delete plan!');
        }
    }

    public function addUserToPlan($planId)
    {
        log_message('debug', '>>> Add User to Plan called for Plan ID: ' . $planId);
    
        $planModel = new PlanModel();
        $plan = $planModel->find($planId);
        if (!$plan || $plan['user_id'] !== session()->get('id')) {
            return redirect()->to('/plans')->with('error', 'You are not authorized to modify this plan.');
        }
    
        $email = $this->request->getPost('email');
        if (!$email) {
            return redirect()->back()->with('error', 'Email is required.');
        }
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User with the provided email does not exist.');
        }
    
        if ($user['id'] === session()->get('id')) {
            return redirect()->back()->with('error', 'You cannot add yourself to the plan.');
        }
    
        $planUserModel = new PlanUserModel();
        $exists = $planUserModel->where(['plan_id' => $planId, 'user_id' => $user['id']])->first();
        if ($exists) {
            return redirect()->back()->with('error', 'User is already added to this plan.');
        }
    
        $data = [
            'plan_id' => $planId,
            'user_id' => $user['id'],
            'is_owner' => false, 
        ];
    
        if ($user['id'] === session()->get('id')) {
            $data['is_owner'] = true;
        }
    
        try {
            $planUserModel->save($data);
            return redirect()->to('/plans')->with('success', 'User added to the plan successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Error adding user to plan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the user.');
        }
    }

    public function removeUserFromPlan($planId, $userEmail)
    {
        log_message('debug', '>>> Remove User from Plan called for Plan ID: ' . $planId . ' and User Email: ' . $userEmail);

        $planModel = new PlanModel();
        $plan = $planModel->find($planId);
        if (!$plan || $plan['user_id'] !== session()->get('id')) {
            return redirect()->to('/plans')->with('error', 'You are not authorized to modify this plan.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $userEmail)->first();
        if (!$user) {
            return redirect()->to('/plans')->with('error', 'User with the provided email does not exist.');
        }

        $planUserModel = new PlanUserModel();
        $userPlan = $planUserModel->where(['plan_id' => $planId, 'user_id' => $user['id']])->first();
        if (!$userPlan) {
            return redirect()->to('/plans')->with('error', 'User is not part of this plan.');
        }

        try {
            $planUserModel->delete($userPlan['id']);
            return redirect()->to('/plans')->with('success', 'User removed from the plan successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Error removing user from plan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while removing the user.');
        }
    }


}