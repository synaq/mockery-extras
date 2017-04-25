pipeline {
    agent any 

    stages {
        stage('Build') { 
            steps { 
                sh 'composer install' 
            }
        }
        stage('Test'){
            steps {
                sh 'phpunit --log-junit results/phpunit/phpunit.xml -c phpunit.xml'
            }
        }
        stage('Deploy') {
            steps {
            }
        }
    }
}
