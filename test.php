<?php
  /**
   *
   *
   *
   */
require_once(__DIR__."/NAPHPStat.php");

$values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$comValues = [1, 2, 3, 4, 5, 7, 9, 10, 12, 15];

$naPhpStat = new NAPHPStat();

$average = $naPhpStat->getAverage($values);
assert($average == 5.5, '平均値の計算が間違っています');

$variance = $naPhpStat->getVariance($values);
assert($variance == 8.25, '分散の計算が間違っています');

$standardDeviation = $naPhpStat->getStandardDeviation($values);
assert(round($standardDeviation, 12) == (2.872281323269), '標準偏差の計算が間違っています');

$convariance = $naPhpStat->getCovariance($values, $comValues);
assert($convariance == 12.4, '共分散の計算が間違っています');

$correlation = $naPhpStat->getCorrelation($values, $comValues);
assert(round($correlation, 14) == (0.98627257846825), '相関係数の計算が間違っています');
