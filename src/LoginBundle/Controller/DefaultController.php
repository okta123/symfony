<?php

namespace LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoginBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LoginBundle\Models\Login;

class DefaultController extends Controller
{
	
	/**
	 * @Route("/", name="homepage")
	 */
    public function indexAction(Request $request)
    {
    	$session = $request->getSession();
    	
    	$em =  $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('LoginBundle:Users');
    	
    	if ($request->getMethod()=='POST')
    	{
    		$session = $request->getSession();
    		$session->clear();
    		$username = $request->get('username');
    		$password = sha1($request->get('password'));
    		
    		 
    
    		$em =  $this->getDoctrine()->getManager();
    		$repository = $em->getRepository('LoginBundle:Users');
    		 
    		$user = $repository->findOneBy(array('username'=>$username,'password'=>$password));
    		if ($user){
    			{
    				$login = new Login();
    				$login->setUsername($username);
    				$login->setPassword($password);
    				$session->set('login',$login);
    			}
    			
    			return $this->render('LoginBundle:Default:success.html.php',array('name'=>$user->getUsername() ));
    		}
    		else
    			return $this->render('LoginBundle:Default:login.html.php',array('name'=>"Username or password incorrect"));
    		}
    	else{
    		if($session->has('login')){
    		$login = $session->get('login');
    		$username = $login->getUsername();
    		$password = $login->getPassword();
    		$user = $repository->findOneBy(array('username'=>$username,'password'=>$password));
    		if ($user){
    			 
    			return $this->render('LoginBundle:Default:success.html.php',array('name'=>$user->getUsername() ));
    			 
    		}
    		}
    		
    	}
    	return $this->render('LoginBundle:Default:login.html.php');
    	
    }
    public function logoutAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->clear();
    	return $this->redirectToRoute('login_homepage');
    }
    public function signupAction(Request $request)
    {
    	
    	if ($request->getMethod() == 'POST') {
    		
    		$name = $request->get('name');
    		$username = $request->get('username');
    		$password = $request->get('password');
    		$role = $request->get('role');
    		
    		
    		
    		$datetime=new \DateTime();
    		
    	 		
  	
    		
    		$user = new Users();
    		$user->setName($name);
    		$user->setUsername($username);
    		$user->setPassword(sha1($password));
    		$user->setRoleId($role);
    		$user->setLastLogin($datetime);
    		
    		
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($user);
    		$em->flush();
    		return $this->redirectToRoute('login_homepage');
    	}
    	return $this->render('LoginBundle:Default:signup.html.php');
    	
    }
}
