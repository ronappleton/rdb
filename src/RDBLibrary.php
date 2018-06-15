<?php

namespace RonAppleton\RDB;

use Config;
use DB;

class RDBLibrary
{
    /**
     * The name of the remote database we are connecting to.
     *
     * @var string $database
     */
    protected $database;

    /**
     * The on the fly database connection.
     *
     * @var \Illuminate\Database\Connection
     */
    protected $connection;

    /**
     * Create a new remote database connection.
     *
     * @param  array $options
     * @return void
     */
    public function __construct($options = null)
    {
        if (empty($options['database'])) {
            return null;
        }

        $this->database = $options['database'];

        $default_config = $this->get_default_config($options);

        $this->build_config($options, $default_config);

        $this->connect($this->database);
    }

    private function connect($database)
    {
        $this->connection = DB::connection($database);
    }

    private function get_default_config($driver=null)
    {
        $driver  = !empty($driver) ? $driver : Config::get('database.default');
        $config = Config::get("database.connections.{$driver}");

        return $config;
    }

    private function build_config($options, $config)
    {
        $this_config = $config;

        foreach($options as $option => $value)
        {
            $this_config[$option] = !empty($options[$option]) ? $options[$option] : $config[$option];
        }

        Config::set("database.connections.{$options['database']}", $this_config);
    }

    /**
     * Get the remote connection.
     *
     * @return \Illuminate\Database\Connection
     */
    public function get_connection()
    {
        return $this->connection;
    }

    /**
     * Get a table from the on the fly connection.
     *
     * @var    string $table
     * @return \Illuminate\Database\Query\Builder
     */
    public function get_table($table = null)
    {
        return $this->get_connection()->table($table);
    }
}