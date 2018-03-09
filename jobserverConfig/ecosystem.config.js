module.exports = {
  /**
   * Application configuration section
   * http://pm2.keymetrics.io/docs/usage/application-declaration/
   */
  apps : [

    // First application
    {
      name      : 'jobserver',
      script    : './jobserver/jobserver.js',
      watch: true,
      env: {
        //COMMON_VARIABLE: 'true'
	NODE_ENV: 'devlopment'
      },
      env_production : {
	"PORT" :562,
        "NODE_ENV" : 'production'
      }
    }
  ]
};
