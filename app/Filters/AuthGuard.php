<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        if (!$session->get('isLoggedIn'))
        {
            log_message('debug', 'Auth failed - Session data: ' . print_r($session->get(), true));
            return redirect()->to('/signin');
        }
        
        // Tambah log untuk session yang valid
        log_message('debug', 'Auth success - User ID: ' . $session->get('id'));
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}