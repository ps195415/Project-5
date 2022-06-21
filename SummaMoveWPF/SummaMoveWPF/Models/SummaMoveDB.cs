using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SummaMoveWPF.Classes
{
    class SummaMoveDB
    {
        MySqlConnection _conn = new MySqlConnection("Server=localhost;Database=summamove;Uid=root;Pwd=;");

    }
}
