pipeline {
  agent {
    node {
      label 'web'
    }

  }
  stages {
    stage('Prod') {
      steps {
        sh '''#!/bin/bash
cp -Rvf ./* /var/www/vhosts/vpapakir.eu/charity.vpapakir.eu/
'''
      }
    }

  }
}
