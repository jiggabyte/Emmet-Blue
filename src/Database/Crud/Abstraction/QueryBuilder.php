<?php declare (strict_types=1);
/**
 * @license MIT
 * @author Samuel Adeshina <samueladeshina73@gmail.com>
 *
 * This file is part of the EmmetBlue project, please read the license document
 * available in the root level of the project
 */

namespace EmmetBlue\Database\Crud\Abstraction;

/**
 * class QueryBuilder.
 * Implements the QueryBuildableInterface contract {@see QueryBuildableInterface}
 *
 * @author Samuel Adeshina <samueladeshina73@gmail.com>
 * @since v0.0.1 27/05/2016 13:35
 */
class QueryBuilder implements QueryBuildableInterface
{

    /**
     * @var string $sqlStatement Global Sql Statement
     * @access private
     */
    private $sqlStatement;

    /**
     * @var string SPACE
     */
    const SPACE = ' ';

    /**
     * @param string | null $sqlStatement SQL Statement to be processed by the build method
     * @throws {@todo Write exception class}
     * @access public
     */
    public function __construct(string $sqlStatement = null)
    {
        self::setSqlStatement($sqlStatement);
    }

    /**
     * Returns the string value of the global sqlStatement variable
     *
     * @access private
     * @return string
     */
    private function getSqlStatement()
    {
        return $this->sqlStatement;
    }

    /**
     * Sets/Modifies the value of the global sqlStatement variable
     *
     * @param string $sqlStatement to set/replace global equivalent to.
     * @access private
     * @return null
     */
    private function setSqlStatement(string $sqlStatement = null)
    {
        $this->sqlStatement = $sqlStatement;

        return;
    }

    /**
     * Builds a QueryBuilder object.
     * {@see QueryBuildableInterface}
     *
     * @param string | null $sqlStringToAppend
     * @throws {@todo Create exceptions}
     * @access public
     * @return QueryBuilder new instance of the QueryBuilder object.
     */
    public function build(string $sqlStringToAppend)
    {
        $separator = (empty(self::getSqlStatement())) ? "" : self::SPACE;
        $newSqlString = self::getSqlStatement().$separator.$sqlStringToAppend;
        self::setSqlStatement($newSqlString);

        return $this;
    }

    /**
     * returns a `built sql` when the QueryBuilder object is casted to a string.
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        return self::getSqlStatement();
    }

    /**
     * Implodes an array into a string
     *
     * @param array $arrayToImplode
     * @param string $delimiter Optional.
     * @access protected
     * @return string
     */
    protected function getImplodedString(array $arrayToImplode, string $delimiter = ",")
    {
        return implode($delimiter, $arrayToImplode);
    }

    /**
     * Wraps a string with specified characters
     *
     * @param string $strBefore
     * @param string|null $strAfter
     * @param string $strToWrap
     * @access public
     * @return string
     */
    public static function wrapString(string $strToWrap, string $strBefore, string $strAfter = null)
    {
        return $strBefore.$strToWrap.(is_null($strAfter) ? $strBefore : $strAfter);
    }
}
