<?php
namespace zf2tidyfilter\Filter;

use Zend\Filter\FilterInterface;
use Tidy;

final class TidyFilter implements FilterInterface
{
    /**
     * Tidy object.
     *
     * @var Tidy
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
        $this->getTidy()->parseString($value, $this->getOptions());
        $this->getTidy()->cleanRepair();
        
        return $this->getTidy()->__toString();
    }
    
    /**
     * Get Tidy.
     *
     * @return Tidy
     */
    public function getTidy()
    {
        if (! $this->tidy) {
            $this->setTidy(new Tidy());
        }
        
        return $this->tidy;
    }
    
    /**
     * Set Tidy.
     *
     * @param Tidy $tidy
     */
    public function setTidy(Tidy $tidy)
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
