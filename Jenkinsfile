pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout([$class: 'GitSCM',
                    branches: [[name: '*/main']],
                    doGenerateSubmoduleConfigurations: false,
                    extensions: [],
                    userRemoteConfigs: [[
                        url: 'https://github.com/nidaaeman1122/Tocs-apache.git'
                    ]]
                ])
            }
        }

        stage('Build') {
            steps {
                echo 'Building project...'
                // No build step required for HTML/CSS/JS
            }
        }
        
        stage('Deploy') {
            steps {
                sshagent(['apache']) {
                    sh '''
                    # Transfer files to the Apache2 server
                    scp -o StrictHostKeyChecking=no -r * ubuntu@13.53.42.113:/var/www/html/
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment successful!'
        }
        failure {
            echo 'Deployment failed!'
        }
    }
}
