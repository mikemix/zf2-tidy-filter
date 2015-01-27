<?php
namespace zf2tidyfilter\Filter;

use Zend\Filter\FilterInterface;
use tidy;

final class TidyFilter implements FilterInterface
{
    /**
     * Tidy object.
     *
     * @var tidy
     */
    private $tidy;

    /**
     * Options passed to parseString().
     *
     * @var array.
     */
    private $options = array();

    /**
     * Returns the result of filtering $value
     *
     * @param mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
    */
    public function filter($value)
    {
        $tidy = $this->getTidy()->parseString($value, $this->getOptions());
        $tidy->cleanRepair();
        
        return $tidy;
    }
    
    /**
     * Get Tidy.
     *
     * @return Tidy
     */
    public function getTidy()
    {
        if (! $this->tidy) {
            $this->setTidy(new tidy());
        }
        
        return $this->tidy;
    }
    
    /**
     * Set Tidy.
     *
     * @param Tidy $tidy
     */
    public function setTidy(tidy $tidy)
    {
        $this->tidy = $tidy;
    }
    
    /**
     * Get options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
    
    /**
     * Set options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}
