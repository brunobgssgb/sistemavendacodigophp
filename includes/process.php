<?php
session_start();
include_once 'database.php';

if (isset($_POST['save_client'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

    if (empty($nome) || empty($telefone)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
        $_SESSION['message_type'] = "error";
        header("Location: ../index.php");
        exit();
    }

    try {
        $sql = "INSERT INTO clientes (nome, telefone) VALUES (:nome, :telefone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Cliente cadastrado com sucesso!";
            $_SESSION['message_type'] = "success";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erro ao cadastrar: " . $e->getMessage();
        $_SESSION['message_type'] = "error";
    }

    header("Location: ../index.php");
    exit();
}