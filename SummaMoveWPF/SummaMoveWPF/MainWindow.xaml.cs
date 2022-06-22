using SummaMoveWPF.Classes;
using SummaMoveWPF.Models;
using System.Collections.Generic;
using System.Windows;

namespace SummaMoveWPF
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private SummaMoveDB _db = new SummaMoveDB();

        public List<Users> user = new List<Users>();

        public MainWindow()
        {
            InitializeComponent();
            Setting();
        }

        public void Setting()
        {
            foreach (Users u in _db.Getusers())
            {
                user.Add(u);
            }
            lstUsers.ItemsSource = user;
        }
        
    }
}
