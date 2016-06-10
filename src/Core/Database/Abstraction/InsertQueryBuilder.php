<?php

declare (strict_types=1);
/**
 * @license MIT
 * @author Chukwuma Nwali <chukznwali@gmail.com>
 */
namespace EmmetBlue\Core\Database\Abstraction;

/**
 * class InsertQueryBuilder.
 * Builds an insert query.
 *
 * {@see QueryBuilder}
 *
 * @author Samuel Adeshina <samueladeshina73@gmail.com>
 *
 * @since 28/05/2016
 */
class InsertQueryBuilder extends QueryBuilder
{
    /**
     * @var \EmmetBlue\Core\Database\Abstraction\QueryBuilder
     */
    private $queryBuilder;

    /**
     * @param string|null $tableName
     */
    public function __construct(string $tableName = null)
    {
        $insertKeyword = (is_null($tableName)) ? 'INSERT' : 'INSERT INTO '.$tableName;
        $this->queryBuilder = $this->build($insertKeyword);
    }

    /**
     * {@inheritdoc}
     *
     * @param string   $tableName
     * @param string[] $tableColumns Optional, provide this to specify the
     *                               columns that should be acted on
     *
     * @return \EmmetBlue\Core\Database\Abstraction\InsertQueryBuilder
     */
    public function into(string $tableName, array $tableColumns = [])
    {
        $intoKeyword = 'INTO '.$tableName;

        if (!empty($tableColumns)) {
            $intoKeyword .= $this->wrapString(self::getImplodedString($tableColumns), '(', ')');
        }

        $this->queryBuilder = $this->queryBuilder->build($intoKeyword);

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param string[] $inputValues
     *
     * @return \EmmetBlue\Core\Database\Abstraction\InsertQueryBuilder
     */
    public function values(array $inputValues)
    {
        $valuesKeyword = 'VALUES ';
        $isMultidimentional = is_array($inputValues[0]);

        if (!$isMultidimentional) {
            $valuesKeyword .= $this->wrapString(self::getImplodedString($inputValues), '(', ')');
        } else {
            $tempValuesKeywords = [];
            foreach ($inputValues as $inputValue) {
                $tempValuesKeywords[] = $this->wrapString(self::getImplodedString($inputValue), '(', ')');
            }

            $valuesKeyword .= self::getImplodedString($tempValuesKeywords);
            unset($tempValuesKeywords);
        }

        $this->queryBuilder = $this->queryBuilder->build($valuesKeyword);

        return $this;
    }
}