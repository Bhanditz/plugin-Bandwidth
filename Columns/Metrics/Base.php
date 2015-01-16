<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */
namespace Piwik\Plugins\Bandwidth\Columns\Metrics;

use Piwik\DataTable\Row;
use Piwik\Metrics\Formatter;
use Piwik\Plugin\ProcessedMetric;
use Piwik\Plugins\Bandwidth\Metrics;

abstract class Base extends ProcessedMetric
{

    public function getMetricAsIntSafe(Row $row, $metric)
    {
        $value = $this->getMetric($row, $metric);

        if (false !== $value) {
            $value = (int) $value;
        }

        return $value;
    }

    public function format($value, Formatter $formatter)
    {
        if ($value) {
            $value = $formatter->getPrettyBytes($value);
        }

        return $value;
    }

    public function getDependentMetrics()
    {
        return array();
    }
}