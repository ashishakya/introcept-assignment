server 'introcept-assignment.ashishakya.com.np',
user: 'ubuntu',
roles: %w{web app},
port: 22

# Directory to deploy
# ===================
set :env, 'staging'
set :app_debug, 'false'
set :deploy_to, '/home/ubuntu/introcept'
set :shared_path, '/home/ubuntu/introcept/shared'
set :overlay_path, '/home/ubuntu/introcept/overlay'
set :tmp_dir, '/home/ubuntu/introcept/tmp'
set :site_url, 'introcept-assignment.ashishakya.com.np'
