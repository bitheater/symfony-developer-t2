Vagrant.configure("2") do |config|
    config.vm.provider :virtualbox do |v|
        v.name = "bitheater-symfony-t2"
	v.memory = 1024
	v.cpus = 2
    end

    config.vm.box = "ubuntu/trusty64"

    config.vm.network :private_network, ip: "192.168.100.100"
    config.ssh.forward_agent = true

    config.vm.provision "ansible" do |ansible|
        ansible.groups = {
            "vagrant-webservers" => [ "default" ],
            "vagrant-dbservers" => [ "default" ],
            "webservers:children" => [ "vagrant-webservers" ],
            "dbservers:children" => [ "vagrant-dbservers" ],
            "vagrant:children" => [ "vagrant-webservers", "vagrant-dbservers" ],
        }
        ansible.raw_ssh_args = [ "-o UserKnownHostsFile=/dev/null" ]
        ansible.playbook = "ansible/playbook.yml"
    end
    config.vm.synced_folder "./", "/home/vagrant/test"
end
