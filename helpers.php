<?php

/**
 * Formata um valor float para o padrão monetário brasileiro.
 *
 * @param float $valor  Valor numérico a ser formatado.
 * @return string       Valor formatado, ex.: R$ 1.440,00
 */
function formatarMoeda(float $valor): string
{
    return 'R$ ' . number_format($valor, 2, ',', '.');
}
