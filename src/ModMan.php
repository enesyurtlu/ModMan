<?php

namespace enesyurtlu\modman;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Controller;

class ModMan extends Controller
{
    /**
     * The application instance.
     *
     * @var Application
     */
    protected $app;

    protected $modules;

    private $modules_dir;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->modules_dir = config("modman.modules_dir");
        $this->modules = preg_grep('/^([^.])/', array_diff(scandir(base_path() ."/".$this->modules_dir), array('..', '.', 'core')));

    }

    public function findModules()
    {
        foreach ($this->modules as $module) {
            $this->app->register($this->modules_dir . "\\" . $module . "\\" . str_replace("_", '', ucwords(ucfirst($module), "_")) . "ServiceProvider");
        }
    }

    public function isExist($module)
    {
        return in_array($module, $this->modules);
    }

    /**
     * @return Repository|mixed
     */
    public function getModulesDir()
    {
        return $this->modules_dir;
    }

    /**
     * @param Repository|mixed $modules_dir
     */
    public function setModulesDir($modules_dir): void
    {
        $this->modules_dir = $modules_dir;
    }
}
