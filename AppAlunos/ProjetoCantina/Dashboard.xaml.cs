using Newtonsoft.Json;
using Firebase.Auth;

namespace ProjetoCantina;

public partial class Dashboard : ContentPage
{
    public Dashboard()
    {
        InitializeComponent();
        GetProfileInfo();
    }

    private void GetProfileInfo()
    {
        var userInfo = JsonConvert.DeserializeObject<Firebase.Auth.FirebaseAuth>(Preferences.Get("FreshFirebaseToken", ""));
        UserEmail.Text = userInfo.User.Email;
    }
}