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

pwd

ls -la'''
      }
    }

  }
}