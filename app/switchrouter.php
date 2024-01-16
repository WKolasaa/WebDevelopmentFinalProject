<?php
class SwitchRouter {
    public function route($uri) {    
        // using a simple switch statement to route URL's to controller methods
        switch($uri) {

            case '' or 'home':
                require __DIR__ . '/controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;

            case 'login':
                require __DIR__ . '/controllers/logincontroller.php';
                $controller = new LoginController();
                $controller->index();
                break;

            case 'register':
                require __DIR__ . '/controllers/registercontroller.php';
                $controller = new RegisterController();
                $controller->index();
                break;

            case 'product':
                require __DIR__ . '/controllers/productcontroller.php';
                $controller = new ProductController();
                $controller->index();
                break;

            case 'logout':
                require __DIR__ . '/controllers/logoutcontroller.php';
                $controller = new LogoutController();
                $controller->index();
                break;

            default:
                http_response_code(404);
                break;
        }
    }
}
?>