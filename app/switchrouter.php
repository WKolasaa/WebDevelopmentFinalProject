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

            case 'order':
                require __DIR__ . '/controllers/ordercontroller.php';
                $controller = new OrderController();

                // Check if there is a specific action for the order controller
                $orderAction = $_GET['action'] ?? null;

                switch ($orderAction) {
                    case 'createOrder':
                        $controller->createOrder();
                        break;

                    default:
                        // If no specific action, default to the index method
                        $controller->index();
                        break;
                }
                break;

            case 'add':
                require __DIR__ . '/controllers/addcontroller.php';
                $controller = new AddController();
                $controller->index();
                break;

            case 'remove':
                require __DIR__ . '/controllers/removecontroller.php';
                $controller = new RemoveController();
                $controller->index();
                break;

            case 'update':
                require __DIR__ . '/controllers/updatecontroller.php';
                $controller = new UpdateController();
                $controller->index();
                break;

            case 'thanks':
                require __DIR__ . '/controllers/thankscontroller.php';
                $controller = new ThanksController();
                $controller->index();
                break;

            default:
                http_response_code(404);
                break;
        }
    }
}
?>