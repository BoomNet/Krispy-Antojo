IC_PROJECT_ACCESS_TOKEN=$1
IC_PROJECT_ID=$2
IC_CUSTOM_WEBAPP_ID=$3

gulp
sudo npm i -g ideascloud-cli
IC_PROJECT_ACCESS_TOKEN=IcCCDUbPsOGT6bzsD2QZBWAe6AgraaWNn99MYbbvn7vdVBqBQF ic-cli project 60f8f4ef5a3f5800084b0b42 upload-custom-webapp-version --custom-webapp-id=616877aa6c6f470008f846ab --description="Version from cli" --folder-path=public/build
