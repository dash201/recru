<?php
namespace Controllers;
use Controllers\Controller;

class Entreprise extends Controller{

    protected $modelName = "\Models\Entreprise";

    /**
     * @login() permet d'identifier un compte entreprise
     */
    public function login(){
        $pageTitle = 'Connexion';
        \Renderer::render('entreprise/login', compact('pageTitle'));
    }

    public function log_request(){
        $req = $this->model->verify($_POST['mail']);
        password_verify($_POST['mdp'], $req['pwd']);
        $_SESSION['id'] = $req['id'];
        \Http::redirect('index.php?controller=Entreprise&task=dashboard');
    }

    /**
     * @register permet de créer un compte entreprise
     */
    public function register(){
        $pageTitle = 'Inscription';
        \Renderer::render('entreprise/register',compact('pageTitle'));
    }

    /**
     * @record() permet d'ajouter un compte à la base de donnée 
     */
    public function record(){
        $this->model->insert([$_POST['raison'], $_POST['mail'], $_POST['tel'], $_POST['mdp']]);
        \Http::redirect('index.php?controller=Entreprise&task=dashboard');
    }

    /**
     * Home page after the login or registration
     */
    public function dashboard(){
        $pageTitle = 'dashboard';
        \Renderer::render('entreprise/dashboard',compact('pageTitle'));
    }

    /**
     * disconnect function 
     */
    public function disconnect(){
        session_destroy();
        \Http::redirect('index.php?controller=Entreprise&task=login');
    }
}