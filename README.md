# rdb
Connect and use remote databases dynamically within a Laravel/Lumen application

The purpose of this module is to be easily installable into a Laravel or Lumen application giving you the ability to be able to connect to and work with remote databases without their configuration values being held with your application config files.

Useful for multi-tenant applications and remote access tools, for example importing data directly from another database rather than using a middle man medium like csv/xml/json.

My aim for this module is to be able to gain information about the remote database easily like structure definitions.

Implementation:

- [ ] Create base module for installing
- [ ] Include Laravels 'extra' data within composer.json for autoloading
- [ ] Create and register Facade for RDB
- [ ] Develop Connection Class
- [ ] Develop Query Class
- [ ] Develop Replication Class
