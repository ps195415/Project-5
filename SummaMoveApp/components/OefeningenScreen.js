import { Text, View, StyleSheet, FlatList, TouchableOpacity, Button } from 'react-native'
import React, { useState, useEffect } from 'react'

const OefeningenScreen = ({ navigation }) => {
  const [data, setData] = useState("")

  const render = ({ item }) => {
    return (
      <View style={styles.itemView}>
        <TouchableOpacity>
          <Text style={styles.text}>{item.naam_NL}</Text>
        </TouchableOpacity>
      </View>

    )
  }
 
  const getOefening = async () => {
    return fetch('https://summasport.herokuapp.com/api/Guest').then((response) => response.json())
      .then((json) => {
        setData(json.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }

  useEffect(() => {
    getOefening()
  }, []);

  return (
    <View style={styles.container}>
      <View style={styles.TestWarpper}>
        <Text style={styles.sectionTitle}>Oefeningen</Text>
        <View>
          <FlatList
            data={data}
            renderItem={render}
            keyExtractor={item => item.id}
          />
        </View>

      </View>
      <View style={styles.addWrapper}>
        <TouchableOpacity style={styles.addText} onPress={() => navigation.navigate("Presentatie")}>
          <Text style={{ fontSize: 30, color: 'white' }}>+</Text>
        </TouchableOpacity>
      </View>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#E8EAED',
  },
  TestWarpper: {
    paddingTop: 80,
    paddingHorizontal: 20,
  },
  sectionTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    marginBottom: 10
  },
  text: {
    fontSize: 20,
    marginTop: 5,
    padding: 15,
  },
  itemView: {
    backgroundColor: '#FFF',
    padding: 5,
    borderRadius: 10,
    marginBottom: 10,

  },
  addWrapper: {
    position: 'absolute',
    bottom: 60,
    width: '90%',
    flex: 1,
    alignItems: 'flex-end'
  },
  addText: {
    height: 60,
    width: 60,
    borderRadius: 60,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#32CD32',
    borderColor: '#C0C0C0',
  }


});

export default OefeningenScreen;

