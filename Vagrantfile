#!/usr/bin/env bash

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"

  config.vm.network "private_network", ip: "192.168.1.104"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.synced_folder "./dev-server", "/home/job-application/dev-server", create: true, group: "www-data", owner: "www-data", mount_options: ["dmode=777", "fmode=777"]
  config.vm.synced_folder "./www", "/home/job-application/www", create: true, group: "www-data", owner: "www-data", mount_options: ["dmode=777", "fmode=777"]

  config.vm.provider :virtualbox do |virtualbox_config|
    virtualbox_config.name = "job-application.local"
    virtualbox_config.memory = 2048
    virtualbox_config.cpus = 2
    config.ssh.forward_agent = true
  end

  config.vm.provision :shell, path: "./dev-server/install.sh"
  config.vm.provision :shell, path: "./dev-server/configure.sh"
end