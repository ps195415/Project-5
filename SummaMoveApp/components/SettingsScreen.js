import { View, Text, StyleSheet, TouchableOpacity } from 'react-native'
import React from 'react'

const SettingsScreen = () => {
  return (
    <View style={styles.container}>
      <Text style={styles.HeaderText}>Taal Setting</Text>
      <View style={styles.containerLeft}>
          <TouchableOpacity style={styles.btn}>
            <Text>Nederland</Text>
          </TouchableOpacity>
      </View>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: 80,
    alignItems: "center",
  },
  containerLeft: {
    flex: 1,
    marginTop: 20,
  },
  HeaderText: {
    fontSize: 20,
    fontWeight: "bold",
  },
  btn: {
    alignItems: "center",
    backgroundColor: "#DDDDDD",
    padding: 10
  }
});

export default SettingsScreen