<?php

/**
 * @file
 * Contains \Eloqua\Api\Assets\ExternalTypes.
 */

namespace Eloqua\Api\Assets;

use Eloqua\Api\AbstractApi;
use Eloqua\Api\ReadableInterface;
use Eloqua\Api\SearchableInterface;
use Eloqua\Exception\InvalidArgumentException;

/**
 * Eloqua External Asset Types
 */
class ExternalTypes extends AbstractApi implements SearchableInterface, ReadableInterface {

  /**
   * {@inheritdoc}

    NOTE: for some reason passing in the $search parameter to the call causes an error
          so search doesn't work for this call. It only returns the complete list.
  */
  
  public function search($search, array $options = array()) {
    return $this->get('assets/external/types', array_merge(array(      
      'depth' => 'complete'
    ), $options));
  }

  /**
   * {@inheritdoc}
   */
  public function show($id, $depth = 'complete', $extensions = null) {
    return $this->get('assets/external/type/' . rawurlencode($id), array(
      'depth' => $depth,
      'extensions' => $extensions,
    ));
  }

  
}
