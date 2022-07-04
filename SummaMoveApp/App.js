import { NavigationContainer } from '@react-navigation/native';
import { createMaterialBottomTabNavigator } from '@react-navigation/material-bottom-tabs';
import { createStackNavigator } from '@react-navigation/stack';
import AboutScreen from './components/AboutScreen';
import SettingsScreen from './components/SettingsScreen';
import OefeningenScreen from './components/OefeningenScreen';
import PrestatieScreen from './components/PrestatieScreen';
import LoginScreen from './components/LoginScreen';
import MaterialCommunityIcons from 'react-native-vector-icons/MaterialCommunityIcons';
const Tab = createMaterialBottomTabNavigator();
const Stack = createStackNavigator();

const AppStack = () => {
  return (
    //
    <Stack.Navigator screenOptions={{
      headerShown: false
    }}>
      <Stack.Screen name="Login" component={LoginScreen} />
      <Stack.Screen name="Home" component={AppTabs} />
      <Stack.Screen options={{headerShown: true}} name="Presentatie" component={PrestatieScreen} />
    </Stack.Navigator>
  );
}


const AppTabs = () => {
  return (
    <Tab.Navigator
      activeColor="#f0edf6"
      inactiveColor="#3e2465"
      barStyle={{ backgroundColor: '#694fad' }}
    >
      <Tab.Screen name="Oefeningen" component={OefeningenScreen}
        options={{
          tabBarIcon: ({ color }) => (
            <MaterialCommunityIcons name="baseball" color={color} size={26} />
          ),
        }} />
      <Tab.Screen name="Over ons" component={AboutScreen} options={{
        tabBarIcon: ({ color }) => (
          <MaterialCommunityIcons name="account-settings" color={color} size={26} />
        ),
      }} />
      <Tab.Screen name="Instellingen" component={SettingsScreen}
        options={{
          tabBarIcon: ({ color }) => (
            <MaterialCommunityIcons name="apps" color={color} size={26} />
          ),
        }} />
    </Tab.Navigator>
  );
}

const App = () => {
  return (
    <NavigationContainer>
      <AppStack />
    </NavigationContainer>
  );
}


export default App;
