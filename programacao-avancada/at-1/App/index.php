<?php
    namespace App;
    require '../vendor/autoload.php';
    use App\Model\Cliente;
    use App\Repository\ClienteRepository;

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    $data = json_decode(file_get_contents('php://input'));

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $cliente = new Cliente();
            $repository = new ClienteRepository($cliente);

            // Caso um ID seja passado na requisição, um cliente específico será buscado
            if (isset($_GET['id'])) {
                $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                // Verificando se o ID fornecido é válido
                if ($id) {
                    // Buscando cliente pelo ID
                    $cliente->setCliente_id($id);
                    $result = $repository->getById($cliente);
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'O valor do ID fornecido não é um inteiro válido.']);
                    exit;
                }

                if ($result) {
                    http_response_code(200); // OK
                    echo json_encode($result);
                } else {
                    http_response_code(404); // Not Found
                    echo json_encode(["message" => "Nenhum dado encontrado."]);
                }
            } else {
                // Buscando todos os clientes
                $result = $repository->getAll();

                echo json_encode($result);
            }

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
        
                $clienteRepository = new ClienteRepository($cliente);
                if ($clienteRepository->insert()) {
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
            // Obtendo os dados da requisição
            $data = json_decode(file_get_contents("php://input"));

            $requiredFields = ['nome', 'email', 'cidade', 'estado'];
            
            // Verificando se os dados são válidos
            if (!isset($data)) {
                http_response_code(400); // Bad Request
                echo json_encode(["error" => "Dados de entrada inválidos."]);
                break;
            }

            $cliente = new Cliente();
            
            $cliente->setNome($data->nome);
            $cliente->setEmail($data->email);
            $cliente->setCidade($data->cidade);
            $cliente->setEstado($data->estado);

            $repository = new ClienteRepository($cliente);
            
            if(isset($_GET['id'])){
                $cliente->setCliente_id($_GET['id']);
    
                // Verificando se o cliente com o ID fornecido existe
                if($repository->getById()){
                    // Atualizando os dados do cliente
                    $success = $repository->update();
                    
                    // Retornando a resposta adequada
                    if ($success) {
                        http_response_code(200); // OK
                        echo json_encode(["message" => "Dados atualizados com sucesso."]);
                    } else {
                        http_response_code(500); // Internal Server Error
                        echo json_encode(["message" => "Falha ao atualizar dados."]);
                    }
                } else { 
                    http_response_code(404); // Not Found
                    echo json_encode(["message" => "Falha ao atualizar, nenhum dado encontrado."]);
                }
            } else { 
                // Caso não tenha sido fornecido um ID, cria um novo cliente
                $success = $repository->insert();
                
                // Retornando a resposta adequada
                if ($success) {
                    http_response_code(200); // OK
                    echo json_encode(["message" => "Dados inseridos com sucesso."]);
                } else {
                    http_response_code(500); // Internal Server Error
                    echo json_encode(["message" => "Falha ao inserir dados."]);
                }
            }

            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input")); 

            if (isset($_GET['id'])) {
                $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                if ($id) {
                    // Criando um novo cliente
                    $cliente = new Cliente();
                    $cliente->setCliente_id($id);

                    $repository = new ClienteRepository($cliente);

                    $result = $repository->getById($cliente);

                    // Verificando se o cliente existe
                    if(!$result){
                        http_response_code(404); // Not Found
                        echo json_encode(["message" => "Nenhum dado encontrado."]);
                    }
                    
                    // Removendo o cliente
                    $success = $repository->delete($cliente);

                    // Retornando a resposta adequada
                    if ($success) {
                        http_response_code(200);
                        echo json_encode(["message" => "Dados apagados com sucesso."]);
                    } else {
                        http_response_code(500);
                        echo json_encode(["message" => "Falha ao apagar dados."]);
                    }
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'O valor do ID fornecido não é um inteiro válido.']);
                    exit;
                }
            }
            break;
    }
?>