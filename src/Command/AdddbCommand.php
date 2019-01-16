<?php
namespace AlissonNascimento\Utils\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Filesystem\File;

class AdddbCommand extends Command
{
    private $modelo = array(
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\\',
        'persistent' => false,
        'host' => '',
        'port' => '',
        'username' => '',
        'password' => '',
        'database' => '',
        'encoding' => 'utf8mb4',
        'timezone' => 'UTC',
        'flags' => [],
        'cacheMetadata' => true,
        'log' => false,
        'quoteIdentifiers' => false,
    );

    protected function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser
            ->addArgument('name', [
                'help' => 'Name of connection'
            ])
            ->addArgument('driver', [
                'help' => 'Set driver'
            ])
            ->addArgument('host', [
                'help' => 'Set host'
            ])
            ->addArgument('port', [
                'help' => 'Set port'
            ])
            ->addArgument('username', [
                'help' => 'Set db username'
            ])
            ->addArgument('password', [
                'help' => 'Set db password'
            ])
            ->addArgument('database', [
                'help' => 'Set database'
            ])
            ->addArgument('encoding', [
                'help' => 'Set database'
            ])
            ;

        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io)
    {
        $name  = $args->getArgument('name');
        $this->modelo['driver']  .= $args->getArgument('driver');
        $this->modelo['host']  = $args->getArgument('host');
        $this->modelo['port']  = $args->getArgument('port');
        $this->modelo['username']  = $args->getArgument('username');
        $this->modelo['password']  = $args->getArgument('password');
        $this->modelo['database']  = $args->getArgument('database');
        $this->modelo['encoding']  = $args->getArgument('encoding');

        $file = new File(ROOT . '/config/database.1.php', true, 0644);
        // $file->write(print_r($this->modelo, true));
        
        $data_array = [$name => $this->modelo];

        $prefix = "<?php\n\nreturn ";

        $file->write($prefix .  var_export($data_array, true) . ';');
        $file->close();
                
        $io->out('Database Criado');
    }
}