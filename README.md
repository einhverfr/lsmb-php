
Copyright (C) 2012 Chris Travers

Redistribution and use in source and compiled forms with or without 
modification, are permitted provided that the following conditions are met:

 * Redistributions of source code must retain the above copyright notice, 
   this list of conditions and the following disclaimer as the first lines 
   of this file unmodified.

 * Redistributions in compiled form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.

This class implements basic LedgerSMB query mapping routines for use in
integrating PHP scripts with LedgerSMB systems.  It could also be used to

This project implements classes that allow PHP applications to interface with 
the LedgerSMB stored procedure system.  Currently we have the base class
(DBObject), a singleton for dealing with the database connections.  The
resulting design makes  it somewhat difficult to use this to move data between
LedgerSMB instances.

DBObject could be used, also, to write extensions to LedgerSMB in PHP opening up
the framework to more languages than just Perl.
