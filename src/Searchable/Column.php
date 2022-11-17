<?php

namespace Sofa\Eloquence\Searchable;

use Illuminate\Database\Grammar;

class Column
{
    /** @var \Illuminate\Database\Grammar */
    protected $grammar;

    /** @var string */
    protected $database;

    /** @var string */
    protected $table;

    /** @var string */
    protected $name;

    /** @var string */
    protected $mapping;

    /** @var integer */
    protected $weight;

    /**
     * Create new searchable column instance.
     * Join Related table found then add database of related Table will be added
     * @param string  $table
     * @param string  $name
     * @param string  $mapping
     * @param integer $weight
     * @param null $database
     */
    public function __construct(Grammar $grammar, $table, $name, $mapping, $weight = 1, $database = null)
    {
        $this->grammar = $grammar;
        $this->table   = $table;
        $this->name    = $name;
        $this->mapping = $mapping;
        $this->weight  = $weight;
    }

    /**
     * Get qualified name wrapped by the grammar.
     *
     * @return string
     */
    public function getWrapped()
    {
        return $this->grammar->wrap($this->getQualifiedName());
    }

    /**
     * Get column name with table prefix.
     *
     * @return string
     */
    public function getQualifiedName()
    {
        if ($this->getDatabase()) {
            return $this->getDatabase() . '.' . $this->getTable() . '.' . $this->getName();
        }
        else {
            return $this->getTable() . '.' . $this->getName();
        }
    }

    /**
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
