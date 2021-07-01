server 'introcept-assignment.ashishakya.com.np',
user: 'ubuntu',
roles: %w{web app},
port: 22

if fetch(:isolated) == "true"
    puts "Deploying isolated with the branch #{fetch(:branch)}"
    set :deploy_to, "/home/ubuntu/introcept/staging-#{fetch(:branch)}"
    set :shared_path, "/home/ubuntu/introcept/staging-#{fetch(:branch)}/shared"
    set :overlay_path, "/home/ubuntu/introcept/staging-#{fetch(:branch)}/overlay"
    puts "deploying to #{fetch(:deploy_to)}"
  else
    puts "Regular deployment of branch #{fetch(:branch)}"
    set :deploy_to, '/home/ubuntu/introcept/staging'
    set :shared_path, '/home/ubuntu/introcept/staging/shared'
    set :overlay_path, '/home/ubuntu/introcept/staging/overlay'
  end


# Directory to deploy
# ===================
set :env, 'staging'
set :app_debug, 'false'
# set :deploy_to, '/home/ubuntu/introcept/staging'
# set :shared_path, '/home/ubuntu/introcept/staging/shared'
# set :overlay_path, '/home/ubuntu/introcept/staging/overlay'
set :tmp_dir, '/home/ubuntu/introcept/staging/tmp'
set :site_url, 'introcept-assignment.ashishakya.com.np'
