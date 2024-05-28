using Firebase.Auth;
using Firebase.Auth.Providers;
using Newtonsoft.Json;
using System.ComponentModel;
using System.Windows.Input; // Ensure you have this using directive for ICommand

namespace ProjetoCantina.ViewModels
{
    internal class LoginViewModel : INotifyPropertyChanged
    {
        private string webApiKey = "AIzaSyBDjAwhc7fMGI8vVx3jC2VO8H6ER4TBfZI"; // Fixed the webApiKey
        private INavigation _navigation;
        private string userName;
        private string userPassword;

        public event PropertyChangedEventHandler? PropertyChanged;

        public ICommand RegisterBtn { get; }
        public ICommand LoginBtn { get; }

        public string UserName
        {
            get => userName;
            set
            {
                userName = value;
                RaisePropertyChanged(nameof(UserName));
            }
        }

        public string UserPassword
        {
            get => userPassword;
            set
            {
                userPassword = value;
                RaisePropertyChanged(nameof(UserPassword));
            }
        }

        public LoginViewModel(INavigation navigation)
        {
            this._navigation = navigation;
            RegisterBtn = new Command(RegisterBtnTappedAsync);
            LoginBtn = new Command(LoginBtnTappedAsync);
        }

        private async void LoginBtnTappedAsync(object obj)
        {
            var config = new FirebaseAuthConfig
            {
                ApiKey = webApiKey,
                AuthDomain = "projeto-cantina-421ee.firebaseapp.com", // Replace with your Auth Domain
                Providers = new FirebaseAuthProvider[]
                {
                    new EmailProvider()
                }
            };

            var authClient = new FirebaseAuthClient(config);

            try
            {
                var auth = await authClient.SignInWithEmailAndPasswordAsync(UserName, UserPassword);
                var content = await auth.User.GetIdTokenAsync();
                var serializedContent = JsonConvert.SerializeObject(content);
                Preferences.Set("FreshFirebaseToken", serializedContent);
                await this._navigation.PushAsync(new Dashboard());
            }
            catch (Exception ex)
            {
                await App.Current.MainPage.DisplayAlert("Alert", ex.Message, "OK");
                throw;
            }
        }

        private async void RegisterBtnTappedAsync(object obj)
        {
            await this._navigation.PushAsync(new RegisterPage());
        }

        private void RaisePropertyChanged(string propertyName)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyName));
        }
    }
}
