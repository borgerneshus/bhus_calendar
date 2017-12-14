<?php
/**
 * @file
 * borgernes_hus_event_calender.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function borgernes_hus_event_calender_taxonomy_default_vocabularies() {
  return array(
    'event_lokation' => array(
      'name' => 'Event Lokation',
      'machine_name' => 'event_lokation',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
