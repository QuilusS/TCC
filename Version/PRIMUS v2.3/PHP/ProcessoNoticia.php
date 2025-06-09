<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['texto'];
    $categoria = $_POST['categoria'];
    $imagemCapa = '';
    $imagem = '';
    $nomeCompleto = isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Anônimo';

    // Diretório para armazenar as imagens das notícias
    $diretorio = 'Fotos das noticias/';
    if (!is_dir('../IMGS/' . $diretorio)) {
        mkdir('../IMGS/' . $diretorio, 0777, true);
    }

    // Variáveis para armazenar caminhos antigos (caso edição)
    $imagemCapaAntiga = '';
    $imagemAntiga = '';

    if (!empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $sqlBusca = "SELECT imagemCapa, imagem FROM noticias WHERE id = ?";
        $stmtBusca = $conn->prepare($sqlBusca);
        $stmtBusca->bind_param("i", $id);
        $stmtBusca->execute();
        $resultBusca = $stmtBusca->get_result();
        if ($row = $resultBusca->fetch_assoc()) {
            $imagemCapaAntiga = $row['imagemCapa'];
            $imagemAntiga = $row['imagem'];
        }
        $stmtBusca->close();
    }

    // Upload da imagem da capa
    if (isset($_FILES['imagemCapa']) && $_FILES['imagemCapa']['error'] == 0) {
        $nomeOriginalCapa = $_FILES['imagemCapa']['name'];
        $caminhoCapa = 'IMGS/' . $diretorio . uniqid('capa_') . '_' . $nomeOriginalCapa;
        if (move_uploaded_file($_FILES['imagemCapa']['tmp_name'], '../' . $caminhoCapa)) {
            $imagemCapa = $caminhoCapa;
            // Exclui a imagem antiga se existir e for diferente da nova
            if (!empty($imagemCapaAntiga) && file_exists('../' . $imagemCapaAntiga)) {
                unlink('../' . $imagemCapaAntiga);
            }
        } else {
            $_SESSION['erro_upload'] = "Erro ao salvar a imagem da capa.";
            header("Location: ../PAGINAS/NoticiasEditar.php");
            exit();
        }
    } else {
        // Se não fez upload novo, mantém a antiga (em edição)
        if (!empty($imagemCapaAntiga)) {
            $imagemCapa = $imagemCapaAntiga;
        }
    }

    // Upload da imagem da notícia
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $nomeOriginal = $_FILES['imagem']['name'];
        $caminho = 'IMGS/' . $diretorio . uniqid('img_') . '_' . $nomeOriginal;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], '../' . $caminho)) {
            $imagem = $caminho;
            // Exclui a imagem antiga se existir e for diferente da nova
            if (!empty($imagemAntiga) && file_exists('../' . $imagemAntiga)) {
                unlink('../' . $imagemAntiga);
            }
        } else {
            $_SESSION['erro_upload'] = "Erro ao salvar a imagem da notícia.";
            header("Location: ../PAGINAS/NoticiasEditar.php");
            exit();
        }
    } else {
        // Se não fez upload novo, mantém a antiga (em edição)
        if (!empty($imagemAntiga)) {
            $imagem = $imagemAntiga;
        }
    }

    // Verifica se é edição (UPDATE) ou criação (INSERT)
    if (!empty($_POST['id'])) {
        // EDIÇÃO
        $sql = "UPDATE noticias SET titulo=?, descricao=?, categoria=?, imagemCapa=?, imagem=?, nomeCompleto=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $titulo, $descricao, $categoria, $imagemCapa, $imagem, $nomeCompleto, $id);

        if ($stmt->execute()) {
            header("Location: ../PAGINAS/Noticias.php");
            exit();
        } else {
            echo "Erro ao editar notícia: " . $conn->error;
        }
    } else {
        // CRIAÇÃO (INSERT)
        $sql = "INSERT INTO noticias (titulo, descricao, categoria, imagemCapa, imagem, nomeCompleto, data_publicacao) 
                VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conn->error);
        }
        $stmt->bind_param("ssssss", $titulo, $descricao, $categoria, $imagemCapa, $imagem, $nomeCompleto);

        if ($stmt->execute()) {
            header("Location: ../PAGINAS/Noticias.php");
            exit();
        } else {
            echo "Erro ao criar notícia: " . $conn->error;
        }
    }
}

if (isset($_GET['acao']) && $_GET['acao'] === 'remover' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Busca o caminho das imagens
    $sqlBusca = "SELECT imagemCapa, imagem FROM noticias WHERE id = $id";
    $result = $conn->query($sqlBusca);
    if ($result && $row = $result->fetch_assoc()) {
        // Exclui imagem da capa
        if (!empty($row['imagemCapa']) && file_exists('../' . $row['imagemCapa'])) {
            unlink('../' . $row['imagemCapa']);
        }
        // Exclui imagem da notícia
        if (!empty($row['imagem']) && file_exists('../' . $row['imagem'])) {
            unlink('../' . $row['imagem']);
        }
    }

    $sql = "DELETE FROM noticias WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $conn->error;
    }
    exit();
}
?>