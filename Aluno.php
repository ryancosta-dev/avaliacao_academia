<?php

/**
 * Classe Aluno
 * Representa um aluno cadastrado na academia.
 */
class Aluno
{
    // Atributos privados
    private ?int $codigo;
    private string $nome;
    private string $plano;
    private float $mensalidade;
    private int $meses;

    /**
     * Construtor da classe Aluno.
     *
     * @param string $nome
     * @param string $plano
     * @param float  $mensalidade
     * @param int    $meses
     * @param int|null $codigo
     */
    public function __construct(
        string $nome,
        string $plano,
        float $mensalidade,
        int $meses,
        ?int $codigo = null
    ) {
        $this->nome        = $nome;
        $this->plano       = $plano;
        $this->mensalidade = $mensalidade;
        $this->meses       = $meses;
        $this->codigo      = $codigo;
    }

    // Getters

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPlano(): string
    {
        return $this->plano;
    }

    public function getMensalidade(): float
    {
        return $this->mensalidade;
    }

    public function getMeses(): int
    {
        return $this->meses;
    }

    /**
     * Calcula o valor total do contrato (mensalidade × meses).
     *
     * @return float
     */
    public function calcularTotalContrato(): float
    {
        return $this->mensalidade * $this->meses;
    }
}
