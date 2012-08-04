<?php

/* CRM classes for LedgerSMB:  person
 * 
 *
 * Copyright (C) 2012 Chris Travers
 *
 * Redistribution and use in source and compiled forms with or without 
 * modification, are permitted provided that the following conditions are met:
 *
 *  * Redistributions of source code must retain the above copyright notice, 
 *    this list of conditions and the following disclaimer as the first lines 
 *    of this file unmodified.
 * 
 *  * Redistributions in compiled form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * 
 * SYNPOSIS:
 * 
 * To call a stored procedure with arguments:
 * 
 *   $person = new Company;
 *
 * To get a person
 *
 *   $person->get($id)
 * 
 * To save a person
 * 
 *   $person->save();
 * 
 * DESCRIPTION
 * 
 * This class is used in LedgerSMB 1.3 specifically for employee management 
 * but in LedgerSMB 1.4 and higher will be used for CRM as well.
 */

namespace LedgerSMB\CRM;

class person extends \LedgerSMB\DBObject {
    public $id;
    public $entity_id;
    public $control_code;
    public $first_name;
    public $middle_name;
    public $last_name;
    /* function get($id)
     * Retrieves an object with an id supplied or undef if not found.
     * This function only works on 1.4 and higher.
     */
    public function get($id){
        if ('1.3' == \LedgerSMB\Config\DBVERSION){
           throw new exception('Unsupported DB Version');
        }
        $data = array_pop($this->call_procedure(
                 $procname = 'person__get', $args = array($id)
        ));
        if (null == $data['entity_id']){
            return null;
        }
        $person = new self();
        $person->merge($data);
        return $person;
 
    }
    /* function save()
     * Saves the person and sets the id.
     */
    public function save(){
        $data = array_pop($this->person__save());
        $this->merge($data);
    }
}
