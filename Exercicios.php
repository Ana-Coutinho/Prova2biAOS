<?php

function calculateFinalScore() {
    $alunos = [
        [
            'nome' => 'João',
            'atitudinal' => 7.0,
            'mensal' => 8.0,
            'bimestral' => 9.0
        ],
        [
            'nome' => 'Maria',
            'atitudinal' => 8.0,
            'mensal' => 9.0,
            'bimestral' => 10.0
        ],
        [
            'nome' => 'José',
            'atitudinal' => 6.0,
            'mensal' => 7.0,
            'bimestral' => 8.0
        ],

        // colca mais alunos
    ];

    $resultados = [];

    foreach ($alunos as $aluno) {
        $fi = ($aluno['atitudinal'] * 0.2) + ($aluno['mensal'] * 0.3) + ($aluno['bimestral'] * 0.5);
        $resultados[] = [
            'nome' => $aluno['nome'],
            'media' => $fi
        ];
    }

    usort($resultados, function($a, $b) {
        return $b['media'] <=> $a['media'];
    });

    $top5 = array_slice($resultados, 0, 5);

    foreach ($top5 as $resultado) {
        echo "{$resultado['nome']} média: {$resultado['media']} \n";
    }
}

calculateFinalScore();

//

function validarCadastro($usuarios, $novoUsuario) {
        if (strlen($novoUsuario['nome']) <= 5) {
            echo "Erro: O nome do usuário deve ter mais que 3 caracteres.";
            return;
        }
    
        if (!filter_var($novoUsuario['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Erro: O email e invalido.";
            return;
        }
    
        if (strlen($novoUsuario['senha']) < 8 or strlen($novoUsuario['senha']) > 16 ) {
            echo "Erro: A senha do usuário deve ter mais que 8 caracteres e no maximo 16 caracteres.";
            return;
        }
    
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $novoUsuario['email']) {
                echo "Erro: Este email já está cadastrado.";
                return;
            }
            
        foreach ($usuarios as $usuario) {
        if ($novoUsuario['confirmacaosenha'] != $novoUsuario['senha']) {
        echo "As senhas devem ser iguais";
        return;
        }
        }
        
    }

    $usuarios[] = $novoUsuario;
    echo "Usuário cadastrado com sucesso!";
    return $usuarios;
    }
    
    $usuarios = [
        [
            "nome" => "João",
            "idade" => 20,
            "email" => "email@email.com",
            "senha" => "12345678"
        ],
        [
            "nome" => "Guilherme",
            "idade" => 17,
            "email" => "meu.email@email.com",
            "senha" => "abc12312312"
        ]
    ];
    
    $novoUsuario = [
        "nome" => "John Doe",
        "idade" => 25,
        "email" => "johndoe@email.com",
        "senha" => "pass54321",
        "confirmacaosenha" => "pass54321",
    ];
    
    validarCadastro($usuarios, $novoUsuario);

?>
