puts "Deploying TheCommonsForAll"

set :application, "thecommonsforall.com"
set :domain, ENV['domain'] || 'toward.thecommonsforall.com'
set :deploy_to,   "/home/wearethecommons/#{domain}"
set :app_path,    "app"
set :web_path,    "web"

set :repository,  "https://github.com/thecommons/thecommonsforall.git"
set :scm,         :git
set :deploy_via,  :remote_cache

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

# General config stuff
set :keep_releases,  10
set :shared_files,      ["app/config/parameters.yml"] # This stops us from having to recreate the parameters file on every deploy.
set :shared_children,   [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
set :dump_assetic_assets, true
set :group_writable, false
# do not remove app_dev.php
set :clear_controllers, false
# Confirmations will not be requested from the command line.
set :interactive_mode, false# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

# per-instance settings
set :branch,      "master"

# ssh settings
set :user, "wearethecommons"
set :use_sudo, false
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "id_rsa")]

# Run migrations before warming the cache
#before "symfony:cache:warmup", "symfony:doctrine:migrations:migrate"

# Custom(ised) tasks
namespace :deploy do
  task :mkdirs do
    run "mkdir -p #{deploy_to}/shared"
    run "mkdir -p #{deploy_to}/releases"
  end

end

before "deploy:update_code", "deploy:mkdirs"
