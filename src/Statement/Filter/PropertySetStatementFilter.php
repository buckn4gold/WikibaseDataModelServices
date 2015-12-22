<?php

namespace Wikibase\DataModel\Services\Statement\Filter;

use Wikibase\DataModel\Statement\Statement;
use Wikibase\DataModel\Statement\StatementFilter;

/**
 * A filter that only accepts statements with specific property ids, and rejects all other
 * properties.
 *
 * @since 3.2
 *
 * @licence GNU GPL v2+
 * @author Thiemo Mättig
 */
class PropertySetStatementFilter implements StatementFilter {

	/**
	 * @var string[]
	 */
	private $propertyIds;

	/**
	 * @param string[]|string $propertyIds One or more property id serializations.
	 */
	public function __construct( $propertyIds ) {
		$this->propertyIds = (array)$propertyIds;
	}

	/**
	 * @see StatementFilter::statementMatches
	 *
	 * @param Statement $statement
	 *
	 * @return bool
	 */
	public function statementMatches( Statement $statement ) {
		$id = $statement->getPropertyId()->getSerialization();
		return in_array( $id, $this->propertyIds );
	}

}
