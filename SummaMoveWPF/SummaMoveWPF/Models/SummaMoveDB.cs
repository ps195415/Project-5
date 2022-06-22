using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using SummaMoveWPF.Models;
using System.Data;

namespace SummaMoveWPF.Classes
{
    internal class SummaMoveDB
    {
        MySqlConnection _conn = new MySqlConnection("Server=localhost;Database=summamove;Uid=root;Pwd=;");

        //hier wordt een connectie gelegd met onze database 

        public List<Users> Getusers()
        {
            List<Users> resultaat = new List<Users>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "SELECT * FROM users";
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                //hier worden alle gegvens van de users opgevraagd vanuit de database

                foreach (DataRow rij in table.Rows)
                {
                    Users users = new Users();

                    users.ID = (int)rij["id"];
                    users.Name = (string)rij["name"];
                    users.Email = (string)rij["email"];

                    Console.ReadLine();
                    resultaat.Add(users);
                    //dit zijn de gegevens die opgehaald worden 
                }

            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
                //als er een foud is krijg je een error message
            }
            finally
            {
                _conn.Close();
                //als alles goed is gegaan word de conectie gesloten 
            }
            return resultaat;
            //hier wordt het resultaat weergegeven
        }

    }
}
