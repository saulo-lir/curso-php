<?php
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends PHPUnit\Framework\TestCase {

  /**
  * @dataProvider somaDataProvider
  */
  public function testSoma($n1, $n2, $esperado){
    $calc = new Calculadora();

    // Resultado esperado, função a ser testada
    $this->assertEquals(
      $esperado,
      $calc->soma($n1, $n2)
    );
  }
/*
  // Vai passar no teste
  public function testSoma2(){
    $calc = new Calculadora();

    // Resultado esperado, função a ser testada
    $this->assertEquals(
      -5,
      $calc->soma(-10, 5)
    );
  }

  // Não vai passar no teste
  public function testSoma3(){
    $calc = new Calculadora();

    // Resultado esperado, função a ser testada
    $this->assertEquals(
      60,
      $calc->soma(50, 9)
    );
  }
*/

  // Um dataProvider é um método para trazer diversos dados que serão testados na função em questão, afim de agilizar e organizar melhor os tests
  public function somaDataProvider() {
    return array(
      // parâmetro 1, parâmetro 2, resultado esperado
      array(1, 1, 2),
      array(20, 10, 30),
      array(-100, 30, -70),
      array(10.5, 0.5, 11)
    );
  }

}