<?php

include "lib/DB.php";
include "lib/DBObject.php";
include "lib/CRM/company.php";
include "config.php";

$db = LedgerSMB\DB::getObject();
$db->dbconnect($dbname = 'mtech_test');

print_r($db);
$db2 = LedgerSMB\DB::getObject();

print_r($db2);

$company = new LedgerSMB\CRM\Company();
$db->begin();

$company2 = $company->get(1);

print_r($company2);

$company2->name = 'foo';
$company2->entity_class=4;
$company2->control_code=4;

$company2->save();
$db->rollback();
$company->is_allowed_role('users_manage');
