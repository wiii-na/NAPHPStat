<?php
  /**
   *
   *
   *
   */

class NAPHPStat {
  /**
   * 平均を求める
   * @param Array $values
   * @return Float
   **/
  public function getAverage(array $values) {
    return (float) (array_sum($values) / count($values));
  }

  /**
   * 分散を求める
   * @param Array $values
   * @return Float
   **/
  public function getVariance(array $values) {
    $average = $this->getAverage($values);

    $ret = 0;
    foreach ($values as $key => $val) {
      $ret += pow(($val - $average), 2);
    }
    return (float) ($ret / count($values));
  }

  /**
   * 標準偏差を求める
   * @param Array $values
   * @return Float
   **/
  public function getStandardDeviation(array $values) {
    $variance = $this->getVariance($values);

    return (float) sqrt($variance);
  }

  /**
   * 共分散を求める
   * @param Array $values
   * @return Float
   **/
  public function getCovariance(array $values, array $comValues) {
    $cnt = (count($values) > count($comValues)) ? count($comValues): count($values);

    $average = $this->getAverage($values);
    $comAverage = $this->getAverage($comValues);
    $ret = [];
    for ($i = 0; $i < $cnt; $i++) {
      $ret[] = ($values[$i] - $average) * ($comValues[$i] - $comAverage);
    }

    return $this->getAverage($ret);
  }

  public function getCorrelation(array $values, array $comValues) {
    $convariance = $this->getCovariance($values, $comValues);
    $sd = $this->getStandardDeviation($values);
    $comSd = $this->getStandardDeviation($comValues);

    return (float) $convariance / ($sd * $comSd);
  }
}
