<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora - Equação do Segundo Grau</title>
</head>
<body>

    <h1>Vamos fazer umas continhas?</h1>

    <p>Informe os coeficentes da equação do segundo grau ax<sup>2</sup> + bx + c. Preencha pelo menos dois campos</p>
    <p>Vale a pena lembrar dois conceitos básicos: </p>
    <ul>
        <li> &Delta; = b<sup>2</sup> - 4ac.</li>
        <li> x = ( -b +/- &radic; &Delta; ) / 2a </li>
    </ul>
    
    <form action="/" method="post">
        <input type="number" name="a" placeholder="a">
        <input type="number" name="b" placeholder="b">
        <input type="number" name="c" placeholder="c">
        <button type="submit">Enviar</button>
    </form>

    <?php 
    
        /*Escreva uma função que receba como parâmetros os coeficientes de uma equação de segundo grau e retorne suas raízes.*/
        
        

        $v_a = $_POST['a'];
        $v_b = $_POST['b'];
        $v_c = $_POST['c'];

        $count = count(array_filter($_POST));

        if($count >= 2){
            print(calculator($v_a, $v_b, $v_c ));
        }else{
            print("*Informe pelo menos dois campos, para calcularmos as raízes de uma equação precisamos de pelo menos dois dos coeficientes.");
        }
        

        function calculator($a, $b, $c){

            $delta = pow($b, 2) - 4 * $a * $c;
            
            if ($delta < 0){    
                 return "A discriminante Delta possuí um valor menor do que zero, portanto a equação não possuí raiz";
            }

            $x1 = ( -($b) + sqrt($delta) ) / 2 * $a;
            $x2 = ( -($b) - sqrt($delta) ) / 2 * $a;
            

            return generateResponse($delta, $x1, $x2);
        }

        function generateResponse($delta, $x1, $x2){
            
            $deltaString = "- Delta: " . $delta;
            $x1String = "- x':" . $x1;
            $x2String = "- x'':" . $x2;

            $message = $deltaString . "<br>" . $x1String . "<br>" . $x2String;
            
            return $message;

        }

    ?>

</body>
</html>