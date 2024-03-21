<?php
    namespace App;
    require '../vendor/autoload.php';
    use App\Model\Cliente;
    use App\Controller\ClientController;

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    $data = json_decode(file_get_contents('php://input'));

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            echo 'GET';
            break;
        case 'POST':
            if (
                isset($data->nome, $data->email, $data->cidade, $data->estado) &&
                is_string($data->nome) &&
                is_string($data->email) &&
                is_string($data->cidade) &&
                is_string($data->estado)
            ) {
                $cliente = new Cliente();
                $cliente->setNome($data->nome);
                $cliente->setEmail($data->email);
                $cliente->setCidade($data->cidade);
                $cliente->setEstado($data->estado);
        
                $clientController = new ClientController($cliente);
                if ($clientController->insertClient()) {
                    echo json_encode(['message' => 'Dados inseridos com sucesso.']);
                } else {
                    echo json_encode(['message' => 'Falha ao inserir dados.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Dados de entrada inválidos.']);
                exit;
            }
            break;
        case 'PUT';
            echo 'PUT';
            break;
        case 'DELETE':
            echo 'DELETE';
            break;
    }

    
?>