<?php

class User {
    private $conn;

    public function __construct($db){
        $this-> conn = $db;
    }

        public function validarCEP($cep) {
        $cepValidator = new CEPValidator();
        return $cepValidator->validarCEP($cep);
    }

 public function register(
    $nome_funcionario, 
    $nome_usuario, 
    $email, 
    $password, 
    $telefone, 
    $cpf, 
    $administrador = 0,
    $cep = '',
    $logradouro = '', 
    $bairro = '', 
    $cidade = '', 
    $uf = '',
    $data_nascimento
) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuarios 
            (nome_funcionario, nome_usuario, email_usuario, data_nascimento, senha_usuario, 
             telefone_usuario, cpf_usuario, administrador,
             cep, logradouro, bairro, cidade, uf) 
            VALUES 
            (:nome_funcionario, :nome_usuario, :email, :data_nascimento, :senha, 
             :telefone, :cpf, :administrador,
             :cep, :logradouro, :bairro, :cidade, :uf)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nome_funcionario', $nome_funcionario);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':senha', $hash);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':administrador', $administrador, PDO::PARAM_INT);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':uf', $uf);
   
    return $stmt->execute();
}
public function login($email,$password){
        $sql = "SELECT * FROM usuarios WHERE email_usuario = :email";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':email', $email);
        $stmt ->execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);


        if($user && password_verify($password, $user['senha_usuario'])){
            return $user;
        }
        return false;
    }


    public function getUserById($userId){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':id', $userId);
        $stmt ->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfilePic($userId,$profilePic){
        $sql = "UPDATE usuarios SET foto_perfil = :profile_pic WHERE id = :id";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':profile_pic', $profilePic);
        $stmt ->bindParam(':id', $userId);
        return $stmt -> execute();
    }
}

    class CEPValidator {
    private $apiTimeout = 5;
    
    public function validarCEP($cep) {
        $cep = preg_replace('/\D/', '', $cep);
        
        if (strlen($cep) !== 8) {
            throw new Exception('CEP deve conter 8 dígitos');
        }
        
        // Tenta ViaCEP primeiro
        $dados = $this->consultarViaCEP($cep);
        if (!$dados) {
            // Fallback para BrasilAPI
            $dados = $this->consultarBrasilAPI($cep);
        }
        
        if (!$dados) {
            throw new Exception('CEP não encontrado');
        }
        
        return [
            'cep' => $cep,
            'logradouro' => $dados['logradouro'] ?? '',
            'bairro' => $dados['bairro'] ?? '',
            'cidade' => $dados['localidade'] ?? $dados['city'] ?? '',
            'uf' => $dados['uf'] ?? $dados['state'] ?? '',
            'api_utilizada' => $dados['api_utilizada'] ?? 'viacep',
            'timestamp_consulta' => date('Y-m-d H:i:s'),
            'status' => 'sucesso'
        ];
    }
    
    private function consultarViaCEP($cep) {
        try {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => "https://viacep.com.br/ws/{$cep}/json/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => $this->apiTimeout,
                CURLOPT_SSL_VERIFYPEER => false
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode === 200 && $response) {
                $data = json_decode($response, true);
                if (!isset($data['erro'])) {
                    $data['api_utilizada'] = 'viacep';
                    return $data;
                }
            }
        } catch (Exception $e) {

        }
        
        return null;
    }
    
    private function consultarBrasilAPI($cep) {
        try {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => "https://brasilapi.com.br/api/cep/v1/{$cep}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => $this->apiTimeout,
                CURLOPT_SSL_VERIFYPEER => false
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode === 200 && $response) {
                $data = json_decode($response, true);
                if (!isset($data['errors'])) {
                    $data['api_utilizada'] = 'brasilapi';
                    return $data;
                }
            }
        } catch (Exception $e) {
            // Log do erro
            error_log("Erro BrasilAPI: " . $e->getMessage());
        }
        
        return null;
    }
}

?>
