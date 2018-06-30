Vagrant.configure("2") do |config|

  config.vm.box = "damianlewis/lamp-php7.1"
  config.vm.network "forwarded_port", guest: 80, host: 8080, id: "apache", protocol: "tcp"

  config.vm.provision "file", source: "setup/15-xdebug.ini", destination: "15-xdebug.ini"
  config.vm.provision "file", source: "setup/000-default.conf", destination: "000-default.conf"
  config.vm.provision "file", source: "setup/shema.sql", destination: "shema.sql"
  config.vm.provision "file", source: "setup/20-yaml.ini", destination: "20-yaml.ini"

  config.vm.provision "shell", path: "setup/setup.sh"

end